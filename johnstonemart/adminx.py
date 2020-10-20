import xadmin
from xadmin import views
from .models import Category, Document,ipAccess

class BaseSettings(object):
    enable_themes = True
    use_bootswatch = True


class GlobalSettings(object):
    site_title = "JSM database"
    site_footer = "Tech support@tianyuema0101@gmail.com"


class CategoryAdmin(object):
    list_display = ['name', 'level', 'position']
    list_editable = ['name', 'position']
    list_filter = ['level']


class DocumentAdmin(object):
    list_display = ['user', 'title', 'category_id', 'description',]
    list_editable = ['title', 'category_id', 'description', ]
    list_filter = ['category_id', 'user']
    #search

    def save_models(self):
        self.new_obj.user = self.request.user
        super().save_models()

    def queryset(self):
         qs = super(DocumentAdmin, self).queryset()
         if self.request.user.is_superuser:  # 超级用户可查看所有数据

             return qs

         else:
             return qs.filter(user=self.request.user)  # user是IDC Model的user字段


class ipAccessAdmin(object):
    list_display = ['name', 'ip_addr']
    list_editable = ['name', 'ip_addr']


xadmin.site.register(views.BaseAdminView, BaseSettings)
xadmin.site.register(views.CommAdminView, GlobalSettings)
xadmin.site.register(Category, CategoryAdmin)
xadmin.site.register(Document, DocumentAdmin)
xadmin.site.register(ipAccess, ipAccessAdmin)