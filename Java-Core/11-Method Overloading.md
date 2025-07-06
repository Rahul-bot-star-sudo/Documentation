
## ✅ Part 1: What is Method Overloading?

### 🔹 Simple Definition:

**Method Overloading** means **defining multiple methods with the same name**, but with **different types or numbers of parameters**.

💡 It allows you to **reuse the same method name** for different purposes.

---

## ✅ Part 2: Example

```java
class Calculator {

  // Method 1
  int add(int a, int b) {
    return a + b;
  }

  // Method 2
  double add(double a, double b) {
    return a + b;
  }

  // Method 3
  int add(int a, int b, int c) {
    return a + b + c;
  }
}
```

### Usage:

```java
Calculator c = new Calculator();

System.out.println(c.add(2, 3));       // Calls Method 1 → 5
System.out.println(c.add(2.5, 3.5));   // Calls Method 2 → 6.0
System.out.println(c.add(1, 2, 3));    // Calls Method 3 → 6
```

---

## 🧠 Real-Life Analogy

Think of a **universal remote**:

* Press the same power button for **TV**, **AC**, or **Speaker**
* The remote **overloads** the same button, but works **differently based on context**

---

## ✅ Rules of Method Overloading

You can overload methods by changing:

1. The **number** of parameters
2. The **type** of parameters
3. The **order** of parameters

---

### ❌ You **cannot** overload by:

* Just changing the **return type**

```java
int show() { return 1; }
String show() { return "Hi"; }  // ❌ ERROR – same method signature
```

---

## 📝 Practice Questions

### Q1: Write two methods named `greet()`:

* One that prints `Hello!`
* One that takes a `String name` and prints `Hello, name!`

### Q2: Create overloaded methods `multiply()`:

* `int multiply(int a, int b)`
* `double multiply(double a, double b)`
* `int multiply(int a, int b, int c)`

### Q3: What’s wrong with this?

```java
int square(int x) { return x * x; }
double square(int x) { return x * x; }
```

---

## ✅ Summary

| Concept              | Example                           |
| -------------------- | --------------------------------- |
| Same method name     | `add()` used multiple times       |
| Different parameters | `int`, `double`, or count differs |
| Return type change ❌ | Not allowed by itself             |

---
