public class errorHandaling {
    public static void main(String[] args) {
        int a = 10;
        int b = 1;

        System.out.println("Addition: " + add(a, b));
        System.out.println("Division: " + divide(a, b));
        System.out.println("Multiplication: " + multiply(a,b)); // Bug hidden here
    }

    public static int add(int x, int y) {
        return x + y;
    }

    public static int divide(int x, int y) {
        return x / y; // Potential bug
    }

    public static int multiply(int x, int y) {
        return x * y;
    }
}
