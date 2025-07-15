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
