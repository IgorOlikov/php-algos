<?php

class TreeNode {
   public int|null $val = null;
   public TreeNode|null $left = null;
   public TreeNode|null $right = null;
    function __construct(int|null $val = 0, TreeNode|null $left = null, TreeNode|null $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

$rootNode = new TreeNode(1, right: new TreeNode(2, left: new TreeNode(3)));

class Solution
{
    function preorderTraversal(TreeNode $root): array
    {
        $res = [];
        $stack = [];
        if (!$root) {
            return $res;
        }
        array_push($stack, $root);
        while ($stack != null) {
            $node = array_pop($stack);
            if ($node->right != null) {
                array_push($stack, $node->right);
            }
            if ($node->left != null) {
                array_push($stack, $node->left);
            }

            $res[] = $node->val;
        }
        return $res;
    }
}

$result = (new Solution())->preorderTraversal($rootNode);

print_r($result);