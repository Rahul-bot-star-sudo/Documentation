
## ✅ Part 1: What is an `if-else` Statement?

### 🔹 Definition:

An `if-else` statement lets your program **choose between two or more options** based on a **condition**.

---

## ✅ Part 2: Basic Syntax

```java
if (condition) {
   // Code runs if condition is true
} else {
   // Code runs if condition is false
}
```

### 🔹 Example:

```java
int age = 18;

if (age >= 18) {
   System.out.println("You are an adult.");
} else {
   System.out.println("You are a minor.");
}
```

📤 **Output:**

```
You are an adult.
```

---

## ✅ Part 3: Else If (Multiple Conditions)

```java
if (marks >= 90) {
   System.out.println("Grade A");
} else if (marks >= 75) {
   System.out.println("Grade B");
} else if (marks >= 50) {
   System.out.println("Grade C");
} else {
   System.out.println("Fail");
}
```

💡 Java checks the conditions **top to bottom**, and as soon as one is true, it **skips the rest**.

---

## 🧠 Real-Life Analogy:

Think of it like:

> “If it’s raining, I’ll take an umbrella.
> Else if it’s sunny, I’ll wear sunglasses.
> Otherwise, I’ll just go as I am.”

---

## ✅ Part 4: Relational and Logical Operators in Conditions

| Operator | Meaning                  | Example           |            |         |   |          |
| -------- | ------------------------ | ----------------- | ---------- | ------- | - | -------- |
| `==`     | Equal to                 | `x == 10`         |            |         |   |          |
| `!=`     | Not equal to             | `x != 10`         |            |         |   |          |
| `>`      | Greater than             | `x > 5`           |            |         |   |          |
| `<`      | Less than                | `x < 100`         |            |         |   |          |
| `>=`     | Greater than or equal to | `x >= 18`         |            |         |   |          |
| `<=`     | Less than or equal to    | `x <= 50`         |            |         |   |          |
| `&&`     | Logical AND              | `a > 5 && b < 10` |            |         |   |          |
| \`       |                          | \`                | Logical OR | \`a > 5 |   | b < 10\` |

---

## ✅ Practice Questions:

### Q1: What will this print?

```java
int num = 10;

if (num % 2 == 0) {
   System.out.println("Even");
} else {
   System.out.println("Odd");
}
```

### Q2: Write a program that:

* Takes age from user
* Prints:

  * “Child” if age < 13
  * “Teenager” if age between 13 and 19
  * “Adult” otherwise

---

## 🔁 Bonus Mini-Challenge:

Write a Java program to:

* Take two numbers from user
* Print which one is greater
* Print "Both are equal" if they are the same

---
