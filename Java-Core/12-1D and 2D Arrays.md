
## ✅ Part 1: What is an Array?

### 🔹 Simple Definition:

An **array** is like a **row of boxes**, each holding a value of the **same type**, with each box having an **index number** starting from 0.

---

### 🔸 Example (1D Array):

```java
int[] numbers = {10, 20, 30, 40};
```

* `numbers[0] = 10`
* `numbers[1] = 20`
* `numbers.length = 4`

---

## ✅ Part 2: Declaring and Using a 1D Array

```java
int[] marks = new int[5];  // Creates array with 5 elements

marks[0] = 50;
marks[1] = 70;
// ... and so on
```

### 🔁 Traversing:

```java
for(int i = 0; i < marks.length; i++) {
    System.out.println(marks[i]);
}
```

---

## ✅ Part 3: 2D Arrays (Matrix)

### 🔹 Definition:

A **2D array** is like a **table** (rows and columns).

```java
int[][] matrix = {
  {1, 2, 3},
  {4, 5, 6},
  {7, 8, 9}
};
```

* `matrix[0][0] = 1`
* `matrix[1][2] = 6`

---

### 🔁 Traversing a 2D Array:

```java
for(int i = 0; i < matrix.length; i++) {
  for(int j = 0; j < matrix[i].length; j++) {
    System.out.print(matrix[i][j] + " ");
  }
  System.out.println();
}
```

---

## 🧠 Real-Life Analogy

* **1D Array**: A row of mailboxes 📬 – one after another.
* **2D Array**: A school timetable – rows = days, columns = periods.

---

## 📝 Practice Questions

### Q1: Create an array of 5 student names and print them using a loop.

### Q2: Declare a 2D array for a 3x3 tic-tac-toe board and print it.

### Q3: What is the output?

```java
int[] nums = {1, 2, 3};
System.out.println(nums[1]);
```

---

## ✅ Summary

| Type     | Syntax                          | Use Case          |
| -------- | ------------------------------- | ----------------- |
| 1D Array | `int[] arr = new int[5];`       | Linear data       |
| 2D Array | `int[][] grid = new int[3][3];` | Table/matrix data |

---