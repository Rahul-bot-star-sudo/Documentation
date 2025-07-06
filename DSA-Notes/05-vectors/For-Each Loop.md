
## ✅ **What is a For-Each Loop?**

A **for-each** loop is used to **traverse elements one by one** in a **collection or array** — without using index numbers.

---

### 🔹 Syntax:

```java
for (dataType variable : collection) {
    // use variable
}
```

> Think of it like: “For each element in the collection, do something.”

---

### 🔸 Example with Array:

```java
int[] nums = {10, 20, 30};

for (int n : nums) {
    System.out.println(n);
}
```

🟢 Output:

```
10
20
30
```

---

### 🔸 Example with Vector:

```java
Vector<String> names = new Vector<>();
names.add("Alice");
names.add("Bob");

for (String name : names) {
    System.out.println(name);
}
```

🟢 Output:

```
Alice
Bob
```

---

## 🧠 Real-Life Analogy:

Imagine you’re checking books in a row.
With a **for-each loop**, you don’t care about the index/position — you just grab each book one by one and read it.

---

### ❗Important Notes:

| Feature                    | For Loop     | For-Each Loop   |
| -------------------------- | ------------ | --------------- |
| Uses Index                 | ✅ Yes        | ❌ No            |
| Easy to Write              | ❌ Bit longer | ✅ Very easy     |
| Can Modify Array Elements? | ✅ Yes        | ⚠️ Not directly |
| Use when you need index?   | ✅ Yes        | ❌ No            |

---

### ❓Practice Question:

```java
char[] letters = {'A', 'B', 'C'};

for (char ch : letters) {
    System.out.print(ch + " ");
}
```

👉 What is the output?

A) ABC
B) A B C
C) A, B, C
D) Error

Your answer?