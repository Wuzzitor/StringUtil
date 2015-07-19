<?php

namespace Wuzzitor;

/**
 * Tests the string helper class.
 *
 * @author Matthias Molitor <matthias@matthimatiker.de>
 * @since 21.06.2012
 */
class StringUtilTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Ensures that startsWith() returns true if the string starts with the given
     * prefix.
     */
    public function testStartsWithReturnsTrueIfTheStringStartsWithTheProvidedPrefix()
    {
        $result = StringUtil::startsWith('this is a test string', 'this');
        $this->assertTrue($result);
    }

    /**
     * Ensures that startsWith() returns false if the string does not start with
     * the prefix, but contains it.
     */
    public function testStartsWithReturnsFalseIfTheStringOnlyContainsThePrefix()
    {
        $result = StringUtil::startsWith('this is a test string', 'test');
        $this->assertFalse($result);
    }

    /**
     * Ensures that startsWith() returns false if the string does not even contain the prefix.
     */
    public function testStartsWithReturnsFalseIfTheStringDoesNotContainThePrefix()
    {
        $result = StringUtil::startsWith('this is a test string', 'demo');
        $this->assertFalse($result);
    }

    /**
     * Ensures that startsWith() returns false if the string is shorter than the
     * prefix and equals the first part of the prefix.
     */
    public function testStartsWithReturnsFalseIfStringEqualsFirstPartOfPrefix()
    {
        $result = StringUtil::startsWith('test', 'testprefix');
        $this->assertFalse($result);
    }

    /**
     * Ensures that endsWith() returns true if the string ends with the given suffix.
     */
    public function testEndsWithReturnsTrueIfTheStringEndsWithTheProvidedSuffix()
    {
        $result = StringUtil::endsWith('this is a test string', 'string');
        $this->assertTrue($result);
    }

    /**
     * Ensures that endsWith() returns false if the string does not end with the
     * given suffix, but contains it.
     */
    public function testEndsWithReturnsFalseIfTheStringOnlyContainsTheSuffix()
    {
        $result = StringUtil::endsWith('this is a test string', 'test');
        $this->assertFalse($result);
    }

    /**
     * Ensures that endsWith() returns false if the string does not even contain
     * the given suffix.
     */
    public function testEndsWithReturnsFalseIfTheStringDoesNotContainTheSuffix()
    {
        $result = StringUtil::endsWith('this is a test string', 'demo');
        $this->assertFalse($result);
    }

    /**
     * Ensures that contains() returns false if the string does not contain
     * the needle.
     */
    public function testContainsReturnsFalseIfStringDoesNotContainNeedle()
    {
        $result = StringUtil::contains('abc', 'd');
        $this->assertFalse($result);
    }

    /**
     * Ensures that contains() returns true if the string contains the needle.
     */
    public function testContainsReturnsTrueIfStringContainsNeedle()
    {
        $result = StringUtil::contains('abc', 'b');
        $this->assertTrue($result);
    }

    /**
     * Ensures that contains() returns true if string and needle are equal.
     */
    public function testContainsReturnsTrueIfStringEqualsNeedle()
    {
        $result = StringUtil::contains('abc', 'abc');
        $this->assertTrue($result);
    }

    /**
     * Checks if contains() searches for digits that are passed as argument.
     *
     * Ensures that integer values are not converted to characters internally.
     */
    public function testContainsSearchesForProvidedDigits()
    {
        $result = StringUtil::contains('123', 2);
        $this->assertTrue($result);
    }

    /**
     * Ensures that containsAny() returns true if a list of needles is provided and
     * the string contains at least one needle in the list.
     */
    public function testContainsAnyReturnsTrueIfStringContainsAtLeastOneOfTheNeedles()
    {
        $result = StringUtil::containsAny('abc', array('d', 'a'));
        $this->assertTrue($result);
    }

    /**
     * Ensures that containsAny() returns false if a list of needles is provided
     * and the string does not contain any of the needles.
     */
    public function testContainsAnyReturnsFalseIfStringContainsNoneOfTheNeedles()
    {
        $result = StringUtil::containsAny('abc', array('d', 'f'));
        $this->assertFalse($result);
    }

    /**
     * Ensures that containsAny() returns true if an empty list of needles is provided.
     */
    public function testContainsAnyReturnsTrueIfListOfNeedlesIsEmpty()
    {
        $result = StringUtil::containsAny('abc', array());
        $this->assertTrue($result);
    }

    /**
     * Ensures that containsAll() returns true if the string contains all
     * of the provided needles.
     */
    public function testContainsAllReturnsTrueIfStringContainsAllNeedles()
    {
        $result = StringUtil::containsAll('abc', array('a', 'c'));
        $this->assertTrue($result);
    }

    /**
     * Ensures that containsAll() returns false if the string contains only some
     * of the provided needles.
     */
    public function testContainsAllReturnsFalseIfStringContainsOnlySomeOfTheNeedles()
    {
        $result = StringUtil::containsAll('abc', array('a', 'd', 'c'));
        $this->assertFalse($result);
    }

    /**
     * Ensures that containsAll() returns true if an empty list of needles is provided.
     */
    public function testContainsAllReturnsTrueIfListOfNeedlesIsEmpty()
    {
        $result = StringUtil::containsAll('abc', array());
        $this->assertTrue($result);
    }

    /**
     * Checks if removePrefix() removes the given prefix from the string.
     */
    public function testRemovePrefixRemovesProvidedPrefix()
    {
        $result = StringUtil::removePrefix('this is a test string', 'this ');
        $this->assertEquals('is a test string', $result);
    }

    /**
     * Ensures that removePrefix() removes the prefix only once.
     */
    public function testRemovePrefixRemovesPrefixOnlyOnce()
    {
        $result = StringUtil::removePrefix('testtestdemo', 'test');
        $this->assertEquals('testdemo', $result);
    }

    /**
     * Ensures that removePrefix() does not modify the string if it does not
     * start with the prefix, but contains it.
     */
    public function testRemovePrefixDoesNotModifyStringIfItOnlyContainsPrefix()
    {
        $result = StringUtil::removePrefix('this is a test string', 'test ');
        $this->assertEquals('this is a test string', $result);
    }

    /**
     * Checks if removeSuffix() removes the provided suffix from the string.
     */
    public function testRemoveSuffixRemovesProvidedSuffix()
    {
        $result = StringUtil::removeSuffix('this is a test string', ' string');
        $this->assertEquals('this is a test', $result);
    }

    /**
     * Ensures that removeSuffix() removes the suffix only once.
     */
    public function testRemoveSuffixRemovesSuffixOnlyOnce()
    {
        $result = StringUtil::removeSuffix('demotesttest', 'test');
        $this->assertEquals('demotest', $result);
    }

    /**
     * Ensures that removeSuffix() does not modify the string if it does not
     * end with the suffix, but contains it.
     */
    public function testRemoveSuffixDoesNotModifyStringIfItOnlyContainsSuffix()
    {
        $result = StringUtil::removeSuffix('this is a test string', 'test');
        $this->assertEquals('this is a test string', $result);
    }

    /**
     * Ensures that replace() does not modify the string if it does not contain
     * the search value.
     */
    public function testReplaceDoesNotModifyStringIfItDoesNotContainSearchString()
    {
        $result = StringUtil::replace('hello world', 'foo', 'bar');
        $this->assertEquals('hello world', $result);
    }

    /**
     * Tests signature replace(string, string, string):
     * Checks if replace() replaces the search string by the provided values.
     */
    public function testReplaceReplacesSingleSearchStringByReplaceValue()
    {
        $result = StringUtil::replace('hello world', 'hello', 'bye');
        $this->assertEquals('bye world', $result);
    }

    /**
     * Tests signature replace(string, string[], string):
     * Checks if replace() replaces all search strings by the provided value.
     */
    public function testReplaceReplacesListOfSearchStringsByReplaceValue()
    {
        $result = StringUtil::replace('hello world', array('hello', 'world'), 'dummy');
        $this->assertEquals('dummy dummy', $result);
    }

    /**
     * Tests signature replace(string, array<string, string>):
     * Checks if replace() applies the mapping of search/replace pairs to the string.
     */
    public function testReplaceAppliesMappingIfAssociativeArrayIsProvided()
    {
        $mapping = array(
                'hello' => 'welcome',
                'world' => 'home'
        );
        $result  = StringUtil::replace('hello world', $mapping);
        $this->assertEquals('welcome home', $result);
    }
}
