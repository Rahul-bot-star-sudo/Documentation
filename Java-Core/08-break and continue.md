
## ✅ Part 1: What is `break`?

### 🔹 Definition:

`break` is used to **immediately stop** a loop or switch-case.

📤 It's like saying:

> “I got what I needed. Stop the loop right here.”

---

### ✅ Example: `break` in `for` loop

```java
for (int i = 1; i <= 5; i++) {
  if (i == 3) {
    break;
  }
  System.out.println(i);
}
```

🧠 Output:

```
1  
2
```

👉 Loop stops **when `i == 3`**

---

## ✅ Part 2: What is `continue`?

### 🔹 Definition:

`continue` **skips the current loop iteration**, but continues with the next one.

📤 It's like saying:

> “Skip this round, go to the next one.”

---

### ✅ Example: `continue` in `for` loop

```java
for (int i = 1; i <= 5; i++) {
  if (i == 3) {
    continue;
  }
  System.out.println(i);
}
```

🧠 Output:

```
1  
2  
4  
5
```

👉 `3` is **skipped**, but the loop goes on.

---

## 🧠 Real-Life Analogy:

* `break`: You're eating snacks. One bite has a bug 🪲. You say “I’m done!” and stop eating.
* `continue`: You're eating snacks. One bite tastes bad. You **skip that bite** and eat the next one.

---

## ✅ Practice Time

### Q1: What’s the output?

```java
for (int i = 1; i <= 5; i++) {
  if (i == 4) {
    break;
  }
  System.out.println(i);
}
```

### Q2: Use `continue` to print **only odd numbers** from 1 to 10.

### Q3: Can `break` and `continue` be used in `while` loops? Try this:

```java
int i = 0;
while (i < 5) {
  i++;
  if (i == 3) continue;
  System.out.println(i);
}
```

👉 What will this print?

---
