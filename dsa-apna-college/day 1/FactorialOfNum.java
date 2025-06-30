// find a factorial of a number

import java.util.Scanner;

public class FactorialOfNum {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter your factorial number...");
        int start = sc.nextInt();
        int i = 1;
        int count = 1;
        while (i <= start) {
            count *= i;
            i++;
        }
        System.out.println("Your factorial is " + count);
        sc.close();
    }
}
