 // Find the Area of square 
import java.util.Scanner;

public class AreaOfSquare {
    @SuppressWarnings("ConvertToTryWithResources")
    public static void main(String[] args) {
        // try-with-resources automatically closes Scanner
       Scanner sc = new Scanner(System.in);
            System.out.print("Enter side of square: ");
            double side = sc.nextDouble();

            double area = side * side;
            System.out.println("Area = " + area);
        
         sc.close();
    }
}
