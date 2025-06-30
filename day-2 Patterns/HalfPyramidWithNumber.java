/* print that pattern
 1
 22
 333
 4444
 55555

*/
import java.util.Scanner;

public class HalfPyramidWithNumber {
     public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter your number of row...");
        int num = sc.nextInt();

        for ( int i = 1 ; i <= num; i++){
            for(int j=1 ; j <= i ; j++){
                 System.out.print(i);
            }
            System.out.println();
        }
        sc.close();
    }
}
