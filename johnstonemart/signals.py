from django.db.models.signals import post_save
from django.dispatch import receiver
from johnstonemart.models import Document

@receiver(post_save, sender=Document)
def create_document(sender, **kwargs):
    print("wqewqeqweqweqwe")