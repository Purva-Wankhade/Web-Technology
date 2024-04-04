package com.example.electricitybillcalculator.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

@Controller
public class ElectricityBillController {

    @GetMapping("/")
    public String showCalculatorForm(Model model) {
        return "calculator";
    }

    @PostMapping("/calculate")
    public String calculateBill(int unitsConsumed, Model model) {
        double totalBill = calculateElectricityBill(unitsConsumed);
        model.addAttribute("unitsConsumed", unitsConsumed);
        model.addAttribute("totalBill", totalBill);
        return "result";
    }

    private double calculateElectricityBill(int unitsConsumed) {
        double totalBill = 0;
        if (unitsConsumed <= 50) {
            totalBill = unitsConsumed * 3.50;
        } else if (unitsConsumed <= 150) {
            totalBill = 50 * 3.50 + (unitsConsumed - 50) * 4.00;
        } else if (unitsConsumed <= 250) {
            totalBill = 50 * 3.50 + 100 * 4.00 + (unitsConsumed - 150) * 5.20;
        } else {
            totalBill = 50 * 3.50 + 100 * 4.00 + 100 * 5.20 + (unitsConsumed - 250) * 6.50;
        }
        return totalBill;
    }
}
