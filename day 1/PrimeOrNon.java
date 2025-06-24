
//calculate the number is Prime or not 

import java.util.Scanner;
public class PrimeOrNon {

    @SuppressWarnings("ConvertToTryWithResources")
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter your check number...");
        int num = sc.nextInt();
        int i = 2;
        int isprime = 0;
        while (i < num) {

            if (num % i == 0) {
                isprime = 1;
                break;
            }
            i++;
        }
        if (isprime == 0) {
            System.out.println("Number is Prime");
        } else {
            System.out.println("Number is Not a Prime");
        }
        sc.close();
    }
}
