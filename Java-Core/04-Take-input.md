
## ✅ Part 1: Output in Java (Printing)

### 🔹 `System.out.print()` vs `System.out.println()`

| Command                | Meaning                                   |
| ---------------------- | ----------------------------------------- |
| `System.out.print()`   | Prints **without** going to the next line |
| `System.out.println()` | Prints and then goes to the **next line** |

### 🔹 Example:

```java
System.out.print("Hello ");
System.out.println("World!");
```

🖨️ **Output:**

```
Hello World!
```

---

## ✅ Part 2: Input in Java (Taking User Input)

Java uses the **Scanner** class to take input from the user.

### 🔸 Step-by-Step to Use Scanner:

```java
import java.util.Scanner;

public class Main {
  public static void main(String[] args) {
    Scanner sc = new Scanner(System.in);  // Create Scanner object

    System.out.println("Enter your name:");
    String name = sc.nextLine();          // Taking a String input

    System.out.println("Enter your age:");
    int age = sc.nextInt();               // Taking an int input

    System.out.println("Hello " + name + ", you are " + age + " years old.");
  }
}
```

---

## ✅ Part 3: Common Scanner Methods

| Method         | Use              | Example Input  |
| -------------- | ---------------- | -------------- |
| `nextInt()`    | Reads an integer | `21`           |
| `nextDouble()` | Reads a decimal  | `3.14`         |
| `next()`       | Reads one word   | `Harry`        |
| `nextLine()`   | Reads whole line | `Harry Potter` |

⚠️ **Warning:** `nextLine()` can behave strangely if used after `nextInt()` or `next()` — I’ll explain below if you want.

---

## 🧠 Real-Life Analogy

🗣️ Your program = a teacher
📋 `System.out.print()` = teacher speaking
📝 `Scanner` = student writing answers on a form

---

## ✅ Practice Time!

### Q1: What will this print?

```java
System.out.print("Name: ");
System.out.print("Harry");
```

### Q2: Write a program that:

* Takes user’s favorite color
* Takes user’s lucky number
* Prints: `"Your color is Blue and your number is 7"`

---