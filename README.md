# MongoDB Practice - Student Collection

## 📦 Description

Yeh project MongoDB shell ke basic commands ke sath practice ke liye banaya gaya hai. Isme `students` naam ka ek collection banakar usme documents insert, update, aur find kiye gaye hain.

---

## 🧰 Prerequisites

1. **MongoDB Installed**  
   MongoDB server aur Mongo Shell dono install hone chahiye.

2. **Start MongoDB Server**  
   Start karne ke liye command:
   ```bash
   net start MongoDB
````

3. **Stop MongoDB Server (Optional)**
   Band karne ke liye command:

   ```bash
   net stop MongoDB
   ```

---

## 🧪 Mongo Shell Use

### Step 1: MongoDB Shell Open Karna

```bash
mongo
```

Ya phir Visual Studio Code / Compass ya kisi GUI tool me bhi connect kar sakte ho:

```
mongodb://localhost:27017
```

---

## 🧾 Basic Queries

### 1️⃣ Show All Databases

```js
show dbs
```

### 2️⃣ Use a Specific Database (create if not exist)

```js
use latest_db
```

### 3️⃣ Insert a Student Document

```js
db.students.insertOne({
  name: "ram",
  age: 12
})
```

### 4️⃣ View All Students

```js
db.students.find()
```

---

## 🔄 Update Operations

### 5️⃣ Update One Document with New Field (`idCards`)

```js
db.students.updateOne(
  { name: "motu" },
  {
    $set: {
      idCards: {
        hasPanCard: true,
        hasAdharCard: true
      }
    }
  }
)
```

### 6️⃣ Update Many Documents to Add `hobbies` Field

❌ Tumne likha tha:

```js
db.students.updateMany{$set:{hobbies: ['anime','cooking']}}
```

✅ Sahi tarika:

```js
db.students.updateMany(
  {},
  {
    $set: {
      hobbies: ["anime", "cooking"]
    }
  }
)
```

---

## 🔍 Query with Conditions

### 7️⃣ Find All Students Who Have a PAN Card

❌ Tumne likha tha:

```js
db.students.find({idCards.hasPanCards':true})
```

✅ Sahi tarika:

```js
db.students.find({ "idCards.hasPanCard": true })
```

### 8️⃣ Find One Student Who Has a PAN Card

```js
db.students.findOne({ "idCards.hasPanCard": true })
```

---

## ✅ Notes

* MongoDB me nested fields ko access karne ke liye `"field.subfield"` ka format use karte hain.
* `updateMany` ke liye `filter` parameter (jaise `{}`) zaroori hai.
* Agar `collection` ya `database` nahi mila to MongoDB automatically bana deta hai jab insert/update hota hai.

---

## 🧠 Future Practice Ideas

* Sorting, Projection, Pagination
* Aggregation pipelines
* Indexing
* Validation Schemas

---

## 🙋 Author

Made by **Rahul** – MongoDB Practice with ❤️

```


