from django.http import HttpResponseForbidden
from .models import ipAccess

class AccessRestrictionMiddleware:

    def __init__(self, get_response):
        self.get_response = get_response
        self.wite_ip = ["127.0.0.1","101.188.63.95"]

    def __call__(self, request):
        ip = request.META['REMOTE_ADDR']
        ip_list = ipAccess.objects.all().values_list('ip_addr')
        ip_list = [ip[0] for ip in ip_list]
        if not ip in (self.wite_ip + ip_list):
            return HttpResponseForbidden("Access Denied by IP, Please contact with Jacky")
        response = self.get_response(request)
        return response