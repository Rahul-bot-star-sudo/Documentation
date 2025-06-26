/* print that pattern

 123456
 12345
 1234
 123
 12
 1
 
*/

import java.util.Scanner;
public class InvertHalfPyramidWithNum{
    public static void main(String arg[]){
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter your rows...");
        int n = sc.nextInt();
        sc.close();
        for(int i =n; i>=1;i--){
            for(int j=1;j<=i;j++){
                System.out.print(j);
            }
            System.out.println();
        }
    }
}