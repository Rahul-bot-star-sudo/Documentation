
## ✅ Part 1: What is an Operator?

### 🔹 **Definition:**

> 🔸 An **operator** is a symbol that performs an operation (like addition, comparison, or logic) on one or more values (operands).

Think of them like **tools** that help you **calculate, compare, or combine values**.

---

## ✅ Part 2: Types of Java Operators

### 🔹 1. **Arithmetic Operators**

Used to perform basic math.

| Operator | Name           | Example (`a = 10, b = 5`) | Result          |
| -------- | -------------- | ------------------------- | --------------- |
| `+`      | Addition       | `a + b`                   | `15`            |
| `-`      | Subtraction    | `a - b`                   | `5`             |
| `*`      | Multiplication | `a * b`                   | `50`            |
| `/`      | Division       | `a / b`                   | `2`             |
| `%`      | Modulus        | `a % b`                   | `0` (remainder) |

---

### 🔹 2. **Relational (Comparison) Operators**

Used to compare two values.

| Operator | Meaning          | Example (`a = 10, b = 5`) | Result  |
| -------- | ---------------- | ------------------------- | ------- |
| `==`     | Equal to         | `a == b`                  | `false` |
| `!=`     | Not equal to     | `a != b`                  | `true`  |
| `>`      | Greater than     | `a > b`                   | `true`  |
| `<`      | Less than        | `a < b`                   | `false` |
| `>=`     | Greater or equal | `a >= b`                  | `true`  |
| `<=`     | Less or equal    | `a <= b`                  | `false` |

---

### 🔹 3. **Logical Operators**

Used for combining conditions.

| Operator | Meaning     | Example         | Result     |        |   |         |        |
| -------- | ----------- | --------------- | ---------- | ------ | - | ------- | ------ |
| `&&`     | Logical AND | `true && false` | `false`    |        |   |         |        |
| \`       |             | \`              | Logical OR | \`true |   | false\` | `true` |
| `!`      | Logical NOT | `!true`         | `false`    |        |   |         |        |

✅ Use logical operators when using multiple conditions in `if` statements.

---

### 🔹 4. **Assignment Operators**

| Operator | Meaning             | Example  | Result (if x = 5) |
| -------- | ------------------- | -------- | ----------------- |
| `=`      | Assign value        | `x = 5`  | `x is 5`          |
| `+=`     | Add and assign      | `x += 3` | `x = x + 3 → 8`   |
| `-=`     | Subtract and assign | `x -= 2` | `x = x - 2 → 6`   |
| `*=`     | Multiply and assign | `x *= 2` | `x = x * 2 → 10`  |
| `/=`     | Divide and assign   | `x /= 5` | `x = x / 5 → 1`   |
| `%=`     | Modulus and assign  | `x %= 2` | `x = x % 2 → 1`   |

---

### 🔹 5. **Unary Operators**

These operate on a **single operand**.

| Operator | Meaning     | Example | Result      |
| -------- | ----------- | ------- | ----------- |
| `++`     | Increment   | `a++`   | Adds 1      |
| `--`     | Decrement   | `a--`   | Subtracts 1 |
| `+`      | Unary plus  | `+a`    | Positive    |
| `-`      | Unary minus | `-a`    | Negative    |
| `!`      | Logical NOT | `!true` | `false`     |

---

### 🔹 6. **Ternary Operator** (Shortcut for `if-else`)

```java
String result = (condition) ? "Yes" : "No";
```

✅ Example:

```java
int age = 18;
String msg = (age >= 18) ? "Adult" : "Minor";
```

---

## 🧠 Real-Life Analogy:

* **Arithmetic Operator**: Like doing calculations on a calculator.
* **Comparison Operator**: Like comparing two players’ scores.
* **Logical Operator**: Like checking if *both* your homework is done **and** your room is clean.
* **Assignment Operator**: Like assigning homework to a student.
* **Unary**: Like increasing a step counter by 1.
* **Ternary**: Like asking yourself: *Is it raining?* → If yes, carry umbrella; else, don’t.

---

## 📝 Practice Time!

Try answering these:

1. What will be the output of:

```java
int a = 8, b = 3;
System.out.println(a % b);
```

2. Fill in the blank:

```java
int x = 10;
x ___ 5;  // Make x = 15 using an operator
```

3. What is the output?

```java
int age = 17;
String msg = (age >= 18) ? "Adult" : "Minor";
System.out.println(msg);
```

4. Fix the error:

```java
int x = true && false;
```
