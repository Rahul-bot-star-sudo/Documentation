// Calculate the sum of 1 to nth number
import java.util.Scanner;
public class sumOfNum1toN {
    public static void main(String arg[]){
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter your nth number for adition...");
        int nthNumber = sc.nextInt();
        int count = 0;
        int sum = 0;
        while (count <= nthNumber) {
            sum += count ;
         count++;     
        }
        System.out.println("sum of " + nthNumber + " is " + sum);
        sc.close();
    }
}
