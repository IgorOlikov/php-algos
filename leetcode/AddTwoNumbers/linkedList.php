<?php

class ListNode {
    public int $val = 0;
    public null|ListNode $next = null;
    function __construct(int $val = 0, null|ListNode $next = null) {
           $this->val = $val;
           $this->next = $next;
    }
 }

//$l1 = new ListNode(2, new ListNode(4, new  ListNode(3)));

//$l2 = new ListNode(5, new ListNode(6, new  ListNode(4)));

$l1 = new ListNode(9, new ListNode(9 , new ListNode(9, new ListNode(9, new ListNode(9, new  ListNode(9, new ListNode(9)))))));

$l2 = new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9))));


class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode // l1 = [2,4,3] l2 = [5,6,4] = output[7,0,8]
    {
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


$result = (new Solution())->addTwoNumbers($l1, $l2);

var_dump($result->val);