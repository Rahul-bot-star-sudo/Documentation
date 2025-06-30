// find the max number
import java.util.Scanner;
public class MaxOfTwoNum {
    @SuppressWarnings("ConvertToTryWithResources")
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter your first number...");
        double first = sc.nextDouble();
        System.out.println("Enter your second number...");
        double second = sc.nextDouble();
        if (first > second) {
            System.out.println(first);
        } else {

            System.out.println(second);
        }
        sc.close();
    }
}
