from rest_framework import serializers
from .models import Document, Category


class CategorySerializer(serializers.ModelSerializer):
    class Meta:
        model = Category
        fields = "__all__"


class DocumentSerializer(serializers.ModelSerializer):
    category_id = CategorySerializer
    user = serializers.SerializerMethodField()

    def get_user(self, obj):
        return obj.user.username

    class Meta:
        model = Document
        fields = "__all__"

