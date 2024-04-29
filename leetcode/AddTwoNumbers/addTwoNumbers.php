<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $fake_head = new ListNode(0);
        $res = $fake_head;
        $carry = 0;

        while ($l1 != null || $l2 != null) {

            $sum = $carry;

            $carry = 0;

            if ($l1 !== null) {
                $sum += $l1->val;
                $l1 = $l1->next;
            }
            if ($l2 !== null) {
                $sum += $l2->val;
                $l2 = $l2->next;
            }

            if ($sum > 9) {
                $carry += 1;
                $sum %= 10;
            }
            $res->next = new ListNode($sum);
            $res = $res->next;
        }

        if ($carry > 0) {
            $res->next = new ListNode($carry);
        }

        return $fake_head->next;
    }

}