<?php

use App\Models\Keyword;

class KeywordTest extends TestCase 
{
    /* Test getKeywordsByName */
    public function test_getKeywordsByName()
    {
        // Verifies that functions works as expected
        $input = array("animi", "error", "cat");
        $items = Keyword::getKeywordsByName($input);
        $this->assertCount(count($items), $input, 
                "Verified that returned item count matches input count");
        
    }
}
