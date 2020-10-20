from .models import Document
import django_filters


class MonumentFilter(django_filters.rest_framework.FilterSet):
    """
    部件过滤类
    """
    category_id = django_filters.CharFilter(field_name='category_id')


    class Meta:
        model = Document
        fields = ['category_id', ]