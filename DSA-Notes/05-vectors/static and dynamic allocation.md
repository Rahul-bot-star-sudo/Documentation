
## ✅ **1. Arrays – Static Allocation**

### 🔹 Example:

```java
int[] arr = new int[5]; // Fixed size of 5
```

### 🔸 Key Points:

* 🔒 **Fixed size** (must be known at compile time)
* 🧠 Memory allocated **statically** — space is set aside immediately
* ⚠️ You **can’t add or remove** elements once size is set
* ✅ Faster access due to fixed memory

---

### 🧠 Analogy:

> You book 5 seats in advance — whether people come or not, the seats are reserved.

---

## ✅ **2. Vectors – Dynamic Allocation**

### 🔹 Example:

```java
Vector<Integer> v = new Vector<>();
v.add(10);
v.add(20);
```

### 🔸 Key Points:

* 🔄 **Size changes automatically** — grows as you add more elements
* 🧠 Memory allocated **dynamically** — Java adjusts size behind the scenes
* ✅ You can add, remove, or insert elements easily
* 📦 Internally resizes the array when needed

---

### 🧠 Analogy:

> You start with a few seats, but more seats are added **on demand** as more people come.

---

## 🔍 Comparison Table:

| Feature                  | Array                  | Vector                    |
| ------------------------ | ---------------------- | ------------------------- |
| Memory Allocation        | Static                 | Dynamic                   |
| Size Fixed?              | ✅ Yes                  | ❌ No (auto-growing)       |
| Can Add/Remove Elements? | ❌ No                   | ✅ Yes                     |
| Access Speed             | 🔼 Fast                | 🔽 Slightly Slower        |
| Use Case                 | Known, fixed-size data | Varying/unknown data size |

---

## 🧪 Practice:

```java
int[] arr = new int[3];
arr[0] = 10;
arr[1] = 20;
arr[2] = 30;
arr[3] = 40; // ❓ What happens here?
```

👉 What will happen?

A) Prints 40
B) Adds new element
C) Error (ArrayIndexOutOfBounds)
D) Nothing happens

Your answer?