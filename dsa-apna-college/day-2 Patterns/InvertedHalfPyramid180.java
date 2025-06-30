
/*print that pattern
      
           *
          **
         ***
        ****
       ***** 
*/
import java.util.Scanner;

public class InvertedHalfPyramid180 {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter your number of row...");
        int num = sc.nextInt();
        for(int i =1 ; i<=num;i++){
            for(int j=1; j<=num-i;j++){
                System.out.print(" ");
            }
            for (int j=1; j<=i;j++){
                System.out.print("*");
            }
            System.out.println();

        }

        
    }
}
