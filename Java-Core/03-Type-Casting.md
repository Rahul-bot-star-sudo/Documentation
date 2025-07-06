
## ✅ Part 1: What is Type Casting?

### 🔹 **Definition**:

> **Type Casting** means **converting one data type into another**, like turning a `float` into an `int`, or an `int` into a `double`.

---

## ✅ Part 2: Two Types of Type Casting

### 🔸 1. **Widening Casting (Automatic)**

👉 Small type → Big type
✅ Done **automatically** by Java

| From                                                   | To |
| ------------------------------------------------------ | -- |
| `byte` → `short` → `int` → `long` → `float` → `double` |    |

### 🔹 Example:

```java
int num = 10;
double bigNum = num;  // int to double (auto)
System.out.println(bigNum);  // Output: 10.0
```

🧠 Analogy: Pouring a small glass of water into a bucket — safe, automatic.

---

### 🔸 2. **Narrowing Casting (Manual)**

👉 Big type → Small type
⛔ You need to **manually** tell Java to convert.

### 🔹 Example:

```java
double pi = 3.14;
int wholePi = (int) pi;  // Manual cast
System.out.println(wholePi);  // Output: 3
```

🧠 Analogy: Pouring water from a bucket into a glass — be careful! You might **lose data** (decimal part gone).

---

## ✅ Part 3: Real-Life Analogy

🎓 Think of **data types as containers**:

* A **mug** (int) fits in a **jug** (double) easily. ✅
* But pouring from **jug to mug** might overflow. ❌

---

## ✅ Part 4: Why Use Type Casting?

* To **convert** between types in calculations.
* To **avoid errors** in assignments.
* Useful when working with **mixed data types** (e.g., int + double).

---

## 🔧 Example Code with Both Types:

```java
public class Main {
  public static void main(String[] args) {
    int x = 7;
    double y = x;           // widening
    System.out.println(y);  // 7.0

    double price = 99.99;
    int newPrice = (int) price;  // narrowing
    System.out.println(newPrice);  // 99
  }
}
```

---

## 🧠 Practice Questions:

1. What will this print?

```java
int a = 20;
double b = a;
System.out.println(b);
```

2. What is the output here?

```java
double val = 45.89;
int x = (int) val;
System.out.println(x);
```

3. Why might narrowing casting be dangerous?

