from django.shortcuts import render
from .models import Student  # Update this line

def index(request):
    if request.method == 'POST':
        name = request.POST['name']
        reg_no = request.POST['reg_no']
        subject1_mse = float(request.POST['subject1_mse'])
        subject1_ese = float(request.POST['subject1_ese'])
        subject2_mse = float(request.POST['subject2_mse'])
        subject2_ese = float(request.POST['subject2_ese'])
        subject3_mse = float(request.POST['subject3_mse'])
        subject3_ese = float(request.POST['subject3_ese'])
        subject4_mse = float(request.POST['subject4_mse'])
        subject4_ese = float(request.POST['subject4_ese'])

        total_subject1 = (subject1_mse * 0.3) + (subject1_ese * 0.7)
        total_subject2 = (subject2_mse * 0.3) + (subject2_ese * 0.7)
        total_subject3 = (subject3_mse * 0.3) + (subject3_ese * 0.7)
        total_subject4 = (subject4_mse * 0.3) + (subject4_ese * 0.7)

        total_marks = total_subject1 + total_subject2 + total_subject3 + total_subject4

        # Save data to database (assuming Student model is defined)
        Student.objects.create(
            name=name,
            reg_no=reg_no,
            subject1_mse=subject1_mse,
            subject1_ese=subject1_ese,
            subject2_mse=subject2_mse,
            subject2_ese=subject2_ese,
            subject3_mse=subject3_mse,
            subject3_ese=subject3_ese,
            subject4_mse=subject4_mse,
            subject4_ese=subject4_ese
        )

        return render(request, 'results/index.html', {'result': total_marks})

    return render(request, 'results/index.html')
