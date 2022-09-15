using System;
using System.Reflection;
using System.Collections;
using System.Collections.Generic;
using NUnit.Framework;
using UnityEngine;
using UnityEngine.TestTools;
using System.IO;
using UnityEditor.TestTools;
using UnityEditor.TestTools.TestRunner;
using UnityEditor.TestTools.TestRunner.Api;
using UnityEngine.TestTools.Constraints;
using UnityEngine.TestTools.Utils;

public class Modul2Test
{
    // A Test behaves as an ordinary method
    [Test]
    public void CheckInt()
    {
        Modul2 modul2 = new Modul2();
        Debug.Log(modul2.a.IsNumericType());

        string intToString = modul2.a.ToString();
        if (intToString.Contains("."))
        {
            // Debug.Log("Value bukan integer");
            Assert.Fail("Value Bukan Integer");
        }
        else
        {
            Assert.Pass("Value Integer");
        }
    }

    [Test]
    public void CheckFloat()
    {
        Modul2 modul2 = new Modul2();
        Debug.Log(modul2.b.IsNumericType());

        string floatToString = modul2.b.ToString();
        if (floatToString.Contains("."))
        {
            Assert.Pass("Value Float");
        }
        else
        {
            Assert.Fail("Value Bukan Float");
        }
    }

    [Test]
    public void CheckDouble()
    {
        Modul2 modul2 = new Modul2();
        Debug.Log(modul2.c.IsNumericType());

        // string doubleToString = modul2.c.ToString();
        if (modul2.c is double)
        {
            Assert.Pass("Value Double");
        }
        else
        {
            Assert.Fail("Value Bukan Double");
        }
    }

    [Test]
    public void CheckString()
    {
        Modul2 modul2 = new Modul2();
        Debug.Log(modul2.d.IsNumericType());

        if (modul2.d is string)
        {
            Assert.Pass("Value String");
        }
        else
        {
            Assert.Fail("Value bukan String");
        }
    }

    [Test]
    public void CheckBoolean()
    {
        Modul2 modul2 = new Modul2();
    
        if (modul2.e is bool)
        {
            Assert.Pass("Value Boolean");
        }
        else
        {
            Assert.Fail("Value bukan Boolean");
        }
    }

    [Test]
    [TestCase(5,7)]
    [TestCase(100,300)]
    [TestCase(-10,-5)]
    public void TestAddition(int a, int b)
    {
        Modul2 modul2 = new Modul2();
        int jumlah = modul2.Addition(a, b);

        Debug.Log("Hasil Penjumlahan " + a + " dan " + b + " = " +jumlah);
        Assert.AreEqual(a+b, jumlah);
    }

    [Test]
    [TestCase(10,7)]
    [TestCase(89,21)]
    [TestCase(-10,-5)]
    public void TestSubstract(int a, int b)
    {
        Modul2 modul2 = new Modul2();
        int jumlah = modul2.Substraction(a, b);

        Debug.Log("Hasil Pengurangan " + a + " dan " + b + " = " +jumlah);
        Assert.AreEqual(a-b, jumlah);
    }

    [Test]
    [TestCase(10,2)]
    [TestCase(225,15)]
    [TestCase(1,2)]
    public void TestDivision(int a, int b)
    {
        Modul2 modul2 = new Modul2();
        int jumlah = modul2.Division(a, b);
        
        Debug.Log("Hasil Pembagian " + a + " dan " + b + " = " +jumlah);
        Assert.AreEqual(a/b, jumlah);
    }

    [Test]
    [TestCase(25,2)]
    [TestCase(8,3)]
    [TestCase(-5,-6)]
    public void TestMultiplication(int a, int b)
    {
        Modul2 modul2 = new Modul2();
        int jumlah = modul2.Multiplication(a, b);

        Debug.Log("Hasil Perkalian " + a + " dan " + b + " = " +jumlah);
        Assert.AreEqual(a*b, jumlah);
    }
}
