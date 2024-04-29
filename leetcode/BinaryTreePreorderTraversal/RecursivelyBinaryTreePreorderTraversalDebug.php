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

class Solution {

    function preorderTraversal(TreeNode $root): array
    {
        $res = [];
        $this->traversal($root, $res);
        return $res;
    }
    function traversal(TreeNode|null $root,array &$res): void
    {
        if(!$root) return;
        $res[] = $root->val;
        $this->traversal($root->left, $res);
        $this->traversal($root->right, $res);
    }

}

$result = (new Solution())->preorderTraversal($rootNode);

print_r($result);