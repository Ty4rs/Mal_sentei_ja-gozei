/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package aula01;
import java.util.Scanner;

/**
 *
 * @author 20201050080121
 */
public class ex01 {

    String nomeN, sobrenomeN;
    double salario;

    void nome(String nome, String sobrenome){
        
        System.out.println("Olá " + nome + " " + sobrenome);
    }
    void incrementarSalario(double salarioN){

        System.out.println("Seu salário é: " + salarioN);
    }
    void informarSalario(double salario){
        System.out.println("Seu salário é: " + salario);
    }

    public static void main(String[] args){
        ex01 nome = new ex01();
        nome.nomeN = "joao"; nome.sobrenomeN = "vitor"; nome.salario = 1200;
        nome.nome(nome.nomeN, nome.sobrenomeN);

        nome.incrementarSalario(1400);
        nome.informarSalario(nome.salario);


    }
}
