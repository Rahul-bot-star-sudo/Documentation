
## ✅ Part 1: What is a Variable?

### 🔹 **Definition:**

> 🔸 A **variable** is a **named container** in memory that stores a value. The value can be changed (varied), hence the name "variable."

### 🔹 Simple Explanation:

A **variable** is like a **box** where you can **store a value** — like a number, a name, or anything else.

📦 `int age = 25;`
Here, `age` is the **box name**, and `25` is what you’ve put inside the box.
`int` tells us that the box can only store **whole numbers (integers)**.

---

## ✅ Part 2: Java Variable Syntax

### 🔹 **Definition:**

> 🔸 **Syntax** is the **set of rules** for writing code. In Java, a variable must be declared with its **data type**, **name**, and optionally an **initial value**.

### 📌 Syntax:

```java
dataType variableName = value;
```

✅ **Example:**

```java
String name = "Harry";
int age = 25;
double price = 99.99;
boolean isJavaFun = true;
```

---

## ✅ Part 3: Java Data Types

### 🔹 **Definition:**

> 🔸 A **data type** tells the compiler what kind of data a variable will store — like numbers, decimals, characters, or true/false values.

---

### 🔹 **Primitive Data Types** (basic ones):

| Data Type | Example Value | Description                          |
| --------- | ------------- | ------------------------------------ |
| `int`     | `10`          | Whole numbers                        |
| `double`  | `10.5`        | Decimal numbers                      |
| `char`    | `'A'`         | A single character                   |
| `boolean` | `true/false`  | True or False                        |
| `float`   | `2.3f`        | Decimal number (with `f` at the end) |

---

### 🔹 **Non-Primitive Types**:

> 🔸 Non-primitive (or reference) data types are built from primitive types. They include objects like `String`, `Array`, and custom Classes.

* `String` – Text like `"Hello"`
* Arrays, Classes, Interfaces, etc. (You’ll learn later)

---

## 🧠 Real-Life Analogy:

Imagine your brain has **lockers**. Each locker (variable) has a **label** (`age`, `name`) and stores **only one type of item** (number, text, etc).
You must **label it properly** before storing something, or you'll confuse the system.

---

## 📝 Practice Questions (Try These):

1. ❓ What’s the output of this?

```java
int x = 10;
int y = 20;
System.out.println(x + y);
```

2. 🧠 Declare a variable to store:

   * Your name
   * Your age
   * Whether you love Java (true/false)

3. ⚠️ Can you guess what’s wrong with this code?

```java
int price = "100";
```

💬 Hint: `"100"` is a **String**, but `price` is declared as an **int**.
