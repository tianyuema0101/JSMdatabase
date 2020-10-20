from datetime import datetime

from django.db import models
from django.contrib.auth.models import User




# Create your models here.
class Category(models.Model):
    LEVEL = (
        (1, "admin"),
        (2, "normal"),
    )

    STORES = {
        ("ALL", "ALL"),
        ("Thomastown", "Thomastown"),
        ("Footscray", "Footscray"),
        ("Dandenong","Dandenong"),
        ("Dandenong South","Dandenong South"),
        ("770 Springvale","770 Springvale"),
        ("Nunawading","Nunawading"),
        ("1 Queens Ave Springvale","1 Queens Ave Springvale"),
        ("Rookwood", "Rookwood"),
        ("Matravile","Matravile")
    }
    name = models.CharField(max_length=40, default="")
    add_time = models.DateTimeField(default=datetime.now)
    level = models.IntegerField(choices=LEVEL)
    position = models.IntegerField(default=9, verbose_name="Sorted Level")
    store = models.CharField(max_length=40, choices=STORES, default="ALL")

    class Meta:
        verbose_name = "category"
        verbose_name_plural = "categories"
        ordering = ['level', 'name']

    def __str__(self):
        if self.level == 1:
            return str(self.name) + "--" + str(self.store)
        else:
            return "Normal" + "--" + str(self.name)

class Document(models.Model):

    user = models.ForeignKey(User, on_delete=models.CASCADE, editable=False,null=True, default= True)
    title = models.CharField(max_length=60, default="")
    category_id = models.ForeignKey(Category, on_delete=models.CASCADE,)
    description = models.TextField(default="")
    document_file = models.FileField(upload_to="documents", null=True, blank=True)
    document_file2 = models.FileField(upload_to="documents", null=True, blank=True)
    document_file3 = models.FileField(upload_to="documents", null=True, blank=True)
    document_file4 = models.FileField(upload_to="documents", null=True, blank=True)
    document_file5 = models.FileField(upload_to="documents", null=True, blank=True)
    add_time = models.DateTimeField(default=datetime.now)

    class Meta:
        verbose_name = "document"
        verbose_name_plural = "documents"


# class DocumentFile(models.Model):
#     document = models.ForeignKey(Document, related_name='files', on_delete=models.CASCADE)
#     file = models.FileField(upload_to="documents", null=True, blank=True)
#     add_time = models.DateTimeField(default=datetime.now)
#
#     class Meta:
#         verbose_name = "document_file"
#         verbose_name_plural = "document_files"

    def __str__(self):
        return str(self.title);


class ipAccess(models.Model):
    name = models.CharField(max_length=60)
    ip_addr = models.CharField(max_length=60, null=False)

    def __str__(self):
        return str(self.ip_addr)