# Create your models here.
from django.db import models

class Student(models.Model):
    name = models.CharField(max_length=100)
    reg_no = models.CharField(max_length=20)
    subject1_mse = models.FloatField()
    subject1_ese = models.FloatField()
    subject2_mse = models.FloatField()
    subject2_ese = models.FloatField()
    subject3_mse = models.FloatField()
    subject3_ese = models.FloatField()
    subject4_mse = models.FloatField()
    subject4_ese = models.FloatField()

    class Meta:
        app_label = 'results'  # Add this line

