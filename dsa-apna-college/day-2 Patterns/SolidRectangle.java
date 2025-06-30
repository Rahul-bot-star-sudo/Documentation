/* print that pattern
 ***** 
 *****
 *****
 *****
*/

import java.util.Scanner;

public class SolidRectangle{
    @SuppressWarnings("ConvertToTryWithResources")
    public static void main(String args []){

        Scanner sc = new Scanner(System.in);
        System.out.println("Enter a row...");
        int row = sc.nextInt();
        System.out.println("Enter a col...");
        int col = sc.nextInt();

        for(int i = 1; i <= row; i++){
            for(int j=1;j<=col;j++){
                System.out.print("*");
            }
            System.out.println();
        }
        sc.close();

    }
}