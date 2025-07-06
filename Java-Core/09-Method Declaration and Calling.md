
## ✅ Part 1: What is a Method?

### 🔹 Simple Definition:

A **method** is a **block of code** that performs a specific task — and you can **reuse it** anytime by **calling it**.

📦 Think of it like a **machine**: You input something → it works → you get output.

---

## ✅ Part 2: Method Syntax (Declaration + Calling)

### 📌 Declaration Syntax:

```java
returnType methodName(parameters) {
   // code to run
}
```

### 📌 Example:

```java
void sayHello() {
   System.out.println("Hello!");
}
```

🧠 This **declares** a method named `sayHello`. It returns nothing (`void`) and takes no input.

---

### ✅ Calling the Method:

You call it using its name:

```java
sayHello(); // This will print: Hello!
```

---

## ✅ Part 3: Method with Parameters

```java
void greet(String name) {
   System.out.println("Hello " + name);
}
```

### Call it like:

```java
greet("Harry");  // Output: Hello Harry
```

---

## ✅ Part 4: Method with Return Value

```java
int add(int a, int b) {
   return a + b;
}
```

### Call it like:

```java
int result = add(5, 7);  // result = 12
System.out.println(result);
```

---

## 🧠 Real-Life Analogy:

🔧 Think of a **method** like a **coffee machine**:

* You press a button (call it)
* It takes inputs (sugar, milk, coffee)
* It does its task (brews it)
* Gives back output (a cup of coffee ☕)

---

## 📝 Practice Questions

### Q1: Write a method `void printEven(int n)` that prints all even numbers up to `n`.

### Q2: Write a method `int square(int x)` that returns the square of a number.

### Q3: Can you create a method `String fullName(String first, String last)` that returns the full name?

---

## ✅ Bonus Concept: `main` Method

In Java, everything starts from the `main()` method:

```java
public class MyClass {
  public static void main(String[] args) {
     sayHello(); // method call
  }

  static void sayHello() {
     System.out.println("Hi there!");
  }
}
```

---

## 🔄 Summary:

| Concept               | Example                    |
| --------------------- | -------------------------- |
| Method without return | `void greet()`             |
| Method with return    | `int add(int a, int b)`    |
| Method call           | `greet();` or `add(5, 3);` |

---
