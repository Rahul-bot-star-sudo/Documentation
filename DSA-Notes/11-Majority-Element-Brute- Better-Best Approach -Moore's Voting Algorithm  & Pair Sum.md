### Majority Element | Brute- Better-Best Approach | Moore's Voting Algorithm | & Pair Sum
[visit leetquetion 169 quetion](https://leetcode.com/problems/majority-element/description/)
#### Brute force approach
```java
import java.util.*;

public class PairSumFinder {
    public static List<Integer> pairSum(int[] nums, int target) {
        List<Integer> ans = new ArrayList<>();
        int n = nums.length;

        for (int i = 0; i < n; i++) {
            for (int j = i + 1; j < n; j++) {
                if (nums[i] + nums[j] == target) {
                    ans.add(i);
                    ans.add(j);
                    return ans;
                }
            }
        }

        return ans; // returns empty list if no pair found
    }

    public static void main(String[] args) {
        int[] nums = {2, 7, 11, 15};
        int target = 9;

        List<Integer> result = pairSum(nums, target);

        if (result.isEmpty()) {
            System.out.println("No pair found.");
        } else {
            System.out.println("Pair indices: " + result);
        }
    }
}
```
### optimise opration with two pointers approach
```java
import java.util.*;

public class PairSumFinder {

    // Helper class to store value and original index
    static class Pair {
        int value, index;
        Pair(int value, int index) {
            this.value = value;
            this.index = index;
        }
    }

    public static List<Integer> pairSum(int[] nums, int target) {
        List<Pair> pairs = new ArrayList<>();
        for (int i = 0; i < nums.length; i++) {
            pairs.add(new Pair(nums[i], i));
        }

        // Sort the pairs by value
        pairs.sort(Comparator.comparingInt(p -> p.value));

        int left = 0;
        int right = nums.length - 1;

        while (left < right) {
            int sum = pairs.get(left).value + pairs.get(right).value;

            if (sum == target) {
                List<Integer> result = new ArrayList<>();
                result.add(pairs.get(left).index);
                result.add(pairs.get(right).index);
                return result;
            } else if (sum < target) {
                left++;
            } else {
                right--;
            }
        }

        return new ArrayList<>(); // no pair found
    }

    public static void main(String[] args) {
        int[] nums = {2, 7, 11, 15};
        int target = 9;

        List<Integer> result = pairSum(nums, target);

        if (result.isEmpty()) {
            System.out.println("No pair found.");
        } else {
            System.out.println("Pair indices: " + result);
        }
    }
}

```

