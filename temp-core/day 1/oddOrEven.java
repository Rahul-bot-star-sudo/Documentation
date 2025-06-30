// Find the number is Even or Odd
import java.util.Scanner;
public class oddOrEven {
    @SuppressWarnings("ConvertToTryWithResources")
    public static void main(String arg[]){
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter a number...");
        int num = sc.nextInt();
        if(num%2==0){
            System.out.println("Number is Even.");
        }
        else
        {
            System.out.println("Number is Odd.");
        }
        sc.close();
    }
}
