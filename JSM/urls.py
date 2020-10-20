"""JSM URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/2.1/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.urls import path, include
from django.contrib import admin
from django.urls import path
from django.conf.urls import url
from django.views.static import serve
from . import settings
from johnstonemart.views import index
from johnstonemart.views import DocumentViewSet, CategoryViewSet
from .settings import MEDIA_ROOT
from rest_framework.documentation import include_docs_urls
from rest_framework.routers import DefaultRouter
from django.contrib.auth import views as auth_views

import xadmin
router = DefaultRouter()
router.register(r'document', DocumentViewSet, base_name="document")
router.register(r'category', CategoryViewSet, base_name="category")
urlpatterns = [
    path('admin/', admin.site.urls),
    url(r'^api/', include(router.urls)),
    path('xadmin/', xadmin.site.urls),
    url(r'^document/(?P<path>.*)$', serve, {"document_root": MEDIA_ROOT}),
    url(r'docs/', include_docs_urls(title="JSM database")),
    path('', index, name='index'),
    url(r'^login/$', auth_views.LoginView.as_view(template_name='login.html'), name='login'),
    url(r'',include('django.contrib.auth.urls')),

]

import datetime
from johnstonemart.models import Document
from django.contrib.auth.models import User
from django.core.mail import send_mail, EmailMessage

from apscheduler.scheduler import Scheduler

sched = Scheduler()


@sched.interval_schedule(days=7)
def auto_notification():
    for category in ['Weekly Report','Weekly Schedule', 'Weekly Sales Figure & Analysis']:
        now = datetime.date.today();
        print(now)
        start = now - datetime.timedelta(days=5)
        user_list = Document.objects.filter(category_id__name=category, add_time__gt=start).values_list(
            "user__email")
        staff_emails = User.objects.filter(is_staff=True).values_list('email')
        print(user_list)
        finish_task = []
        for email in user_list:
            if email[0] != "":
                finish_task.append(email[0])

        unfinish_task = []
        for email in staff_emails:
            if email[0] != "" and email[0] not in finish_task:
                unfinish_task.append(email[0])
        print(unfinish_task)
        send_email_notification(category, unfinish_task)

sched.start()


def send_email_notification(type, emails = ["tianyuema0101@gmail.com"]):
    subject = ("Notification " + type)
    message = "There is a new notification from John Stonemart Management Team\n"
    message += ("Please upload your " + type + " on time\n\n")

    mail = EmailMessage(
                        subject,
                        message,
                        "info@johnstonemart.com",
                        emails,
    )
    mail.send()