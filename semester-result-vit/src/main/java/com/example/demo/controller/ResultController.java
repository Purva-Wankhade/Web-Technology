package com.example.demo.controller;

import com.example.demo.model.Student;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("/result")
public class ResultController {

    @GetMapping
    public String getResultForm(Model model) {
        model.addAttribute("student", new Student());
        return "result";
    }

    @PostMapping
    public String calculateResult(Student student, Model model) {
        double result1 = (student.getMse1() * 0.3) + (student.getEse1() * 0.7);
        double result2 = (student.getMse2() * 0.3) + (student.getEse2() * 0.7);
        double result3 = (student.getMse3() * 0.3) + (student.getEse3() * 0.7);
        double result4 = (student.getMse4() * 0.3) + (student.getEse4() * 0.7);

       
        double totalPercentage = (result1 + result2 + result3 + result4) / 4.0;

        model.addAttribute("result1", result1);
        model.addAttribute("result2", result2);
        model.addAttribute("result3", result3);
        model.addAttribute("result4", result4);
        model.addAttribute("totalPercentage", totalPercentage);
        return "result";
    }
}

