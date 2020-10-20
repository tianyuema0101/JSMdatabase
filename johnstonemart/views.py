from django.shortcuts import render
import os
from os.path import dirname
# Create your views here.
from rest_framework import mixins
from rest_framework import viewsets
from rest_framework import filters
from .serializers import DocumentSerializer, CategorySerializer
from rest_framework.pagination import PageNumberPagination

from rest_framework.authentication import SessionAuthentication, BasicAuthentication
from rest_framework.permissions import IsAuthenticated

from django.contrib.auth.models import User

from django_filters.rest_framework import DjangoFilterBackend
from . models import Document, Category
from django.template.response import TemplateResponse
from django.http.response import HttpResponse

from django.contrib.auth.decorators import login_required

#email dependency
from django.core.mail import send_mail, EmailMessage

from django.db.models.signals import post_save
from django.dispatch import receiver
from johnstonemart.models import Document

class StandardResultsSetPagination(PageNumberPagination):
    page_size = 10
    page_size_query_param = 'page_size'
    page_query_param = 'page'
    max_page_size = 100


class DocumentViewSet(mixins.ListModelMixin, mixins.RetrieveModelMixin, viewsets.GenericViewSet):
    authentication_classes = [SessionAuthentication, BasicAuthentication]
    permission_classes = [IsAuthenticated,]

    serializer_class = DocumentSerializer
    pagination_class = StandardResultsSetPagination
    filter_backends = (DjangoFilterBackend, filters.SearchFilter)
    filter_fields = ('category_id',)
    search_fields = ('title', 'user__username')

    def get_queryset(self):
        if self.request.user.is_superuser:
            return Document.objects.all()
        else:
            return Document.objects.filter(category_id__level=2)



class CategoryViewSet(mixins.ListModelMixin, viewsets.GenericViewSet):
    serializer_class = CategorySerializer
    filter_backends = [filters.OrderingFilter]
    filter_backends = (DjangoFilterBackend, filters.SearchFilter)
    filter_fields = ('level',)
   # ordering_fields = ('level','position','name')
    def get_queryset(self):
        if self.request.user.is_superuser:
            return Category.objects.all().order_by('-position', 'name')
        else:
            return Category.objects.filter(level=2).order_by('-position', 'name')


@login_required(login_url='/login/')
def index(request):
    html = TemplateResponse(request, 'index2.html')
    return HttpResponse(html.render())


@receiver(post_save,  sender=Document)
def create_document(sender, instance = None,created=False, **kwargs):
    if created:
        if instance.category_id.level == 1:
            emails = superuser_emails()
            send_email(instance, "Admin Information",emails)

        else:
            emails = user_emails()
            send_email(instance, "Notification", emails)


def user_emails():
    user_emails = User.objects.all().values_list('email')
    emails = []
    for email in user_emails:
        if email[0] != "":
            emails.append(email[0])
    return emails

def superuser_emails():
    user_emails = User.objects.filter(is_superuser=True).values_list('email')
    emails = []
    for email in user_emails:
        if email[0] != "":
            emails.append(email[0])
    return emails

def send_email(instance, type, emails = ["tianyuema0101@gmail.com"]):
    subject = type + ": " + instance.title
    message = "There is a new notification from John Stonemart Management Team\n"
    message += "It is your responsibility, if you do not check your email notification\n\n"
    message += ("Sender: " + str(instance.user) + "\n")
    message += ("Title: " + str(instance.title + "\n"))
    message += ("Category: " + str(instance.category_id) + "\n")
    message += ("Description: " + str(instance.description) + "\n")
    mail = EmailMessage(
                        subject,
                        message,
                        "info@johnstonemart.com",
                        emails,
    )
    # cur_location = dirname(dirname(os.path.abspath(__file__)))
    # document_location = os.path.join(cur_location,"document")
    # if str(instance.document_file) != "":
    #     mail.attach_file(os.path.join(document_location, str(instance.document_file)))
    #
    # if str(instance.document_file2) != "":
    #     mail.attach_file(os.path.join(document_location, str(instance.document_file2)))
    #
    # if str(instance.document_file3) != "":
    #     mail.attach_file(os.path.join(document_location, str(instance.document_file3)))
    #
    # if str(instance.document_file4) != "":
    #     mail.attach_file(os.path.join(document_location, str(instance.document_file4)))
    #
    # if str(instance.document_file5) != "":
    #     mail.attach_file(os.path.join(document_location, str(instance.document_file5)))


    mail.send()

