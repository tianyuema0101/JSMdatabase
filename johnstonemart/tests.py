
import os
import sys
import datetime

pwd = os.path.dirname(os.path.realpath(__file__))
sys.path.append(pwd+"../")

os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'JSM.settings')

import django
django.setup()

import datetime
from johnstonemart.models import Document
from django.contrib.auth.models import User
from django.core.mail import send_mail, EmailMessage


def send_email(type, emails = ["tianyuema0101@gmail.com"]):
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

if __name__ == "__main__":
    now = datetime.date.today();
    start = now - datetime.timedelta(days=5)
    user_list = Document.objects.filter(category_id__name="Weekly report", add_time__gt=start).values_list("user__email")
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

    send_email("Weekly report")

