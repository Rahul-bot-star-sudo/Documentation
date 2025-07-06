
## ✅ Part 1: What is `switch-case`?

### 🔹 Definition:

`switch-case` is used to **check a variable against multiple values**. It's like giving the program a **menu** and saying:
👉 “If it’s 1, do this... if it’s 2, do that... if nothing matches, do something else.”

---

## ✅ Part 2: Syntax

```java
switch (variable) {
  case value1:
    // Code block
    break;
  case value2:
    // Code block
    break;
  ...
  default:
    // Code block if none match
}
```

---

## 🔹 Example:

```java
int day = 2;

switch (day) {
  case 1:
    System.out.println("Monday");
    break;
  case 2:
    System.out.println("Tuesday");
    break;
  case 3:
    System.out.println("Wednesday");
    break;
  default:
    System.out.println("Another day");
}
```

📤 **Output:**

```
Tuesday
```

---

## ✅ Part 3: Important Rules

| Rule               | Description                                             |
| ------------------ | ------------------------------------------------------- |
| `break`            | Stops the code from “falling through” to the next case. |
| `default`          | Like `else` — runs if no `case` matches.                |
| `switch` supports: | `int`, `char`, `String`, `byte`, `short`, `enum`        |

---

## 🧠 Real-Life Analogy:

Imagine you're ordering coffee:

```java
switch (order) {
  case "espresso": → Give espresso
  case "latte": → Give latte
  case "mocha": → Give mocha
  default: → Say “Sorry, we don’t have that”
}
```

---

## ✅ Practice Questions:

### Q1: What will this print?

```java
char grade = 'B';

switch (grade) {
  case 'A':
    System.out.println("Excellent!");
    break;
  case 'B':
    System.out.println("Good job!");
    break;
  case 'C':
    System.out.println("Well done");
    break;
  default:
    System.out.println("Keep trying!");
}
```

---

### Q2: Mini Project

Write a program that:

* Takes a number `1-7` from the user
* Prints the name of the day (e.g., 1 = Sunday, 2 = Monday...)

---

### Q3: Quiz: What happens if you **don’t use `break`**?

Try this:

```java
int option = 1;

switch (option) {
  case 1:
    System.out.println("Option 1");
  case 2:
    System.out.println("Option 2");
  case 3:
    System.out.println("Option 3");
}
```

👉 What will the output be?

---
