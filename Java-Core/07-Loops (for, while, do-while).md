
## ✅ Part 1: What is a Loop?

### 🔹 Simple Definition:

A **loop** repeats a task again and again **until a condition is false**.

🧠 Think of a loop as:

> "Keep brushing until your teeth are clean."

---

## ✅ Part 2: Types of Loops in Java

| Loop Type       | Used When...                                                               |
| --------------- | -------------------------------------------------------------------------- |
| `for` loop      | You know **how many times** to repeat                                      |
| `while` loop    | You want to repeat **as long as condition is true**                        |
| `do-while` loop | You want the code to run **at least once**, even if the condition is false |

---

## 🔹 1. `for` Loop – Fixed Repeats

### 📌 Syntax:

```java
for (initialization; condition; update) {
   // code to repeat
}
```

### ✅ Example:

```java
for (int i = 1; i <= 5; i++) {
   System.out.println("Hello " + i);
}
```

🧠 Output:

```
Hello 1  
Hello 2  
Hello 3  
Hello 4  
Hello 5
```

---

## 🔹 2. `while` Loop – Unknown Repeats

### 📌 Syntax:

```java
while (condition) {
   // code to repeat
}
```

### ✅ Example:

```java
int i = 1;
while (i <= 3) {
   System.out.println("Count: " + i);
   i++;
}
```

---

## 🔹 3. `do-while` Loop – Runs At Least Once

### 📌 Syntax:

```java
do {
   // code to run
} while (condition);
```

### ✅ Example:

```java
int i = 1;
do {
   System.out.println("I will run at least once!");
   i++;
} while (i <= 0);
```

🧠 Output:

```
I will run at least once!
```

---

## 🧠 Real-Life Analogy:

* `for`: "Brush 30 times."
* `while`: "Brush until it feels clean."
* `do-while`: "Brush once, then check if it’s clean."

---

## 📝 Practice Questions:

### Q1: What’s the output?

```java
for (int i = 5; i >= 1; i--) {
   System.out.print(i + " ");
}
```

### Q2: Write a program using `while` to print numbers from 1 to 10.

### Q3: Use `do-while` to keep printing "Enter Password:" until the user types `1234`.

---

## 🚀 Bonus Challenge:

Write a program that:

* Takes a number from the user
* Prints the **multiplication table** (like 5 × 1 = 5 … 5 × 10 = 50) using a `for` loop

---
