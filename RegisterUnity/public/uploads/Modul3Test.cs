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

public class Modul3Test
{
    // A Test behaves as an ordinary method
    [Test]
    [TestCase(100)]
    [TestCase(60)]
    [TestCase(40)]
    public void TestIf(int nyawa)
    {
        Modul3 modul3 = new Modul3();
        if (nyawa == 100)
        {
            Assert.AreEqual("Nyawa Sempurna", modul3.IfLogic(nyawa));
        }
        if (nyawa < 100)
        {
            Assert.AreEqual("Nyawa Kurang dari 100", modul3.IfLogic(nyawa));
        }
    }

    [Test]
    [TestCase(80)]
    [TestCase(40)]
    public void TestIfElse(int nyawa)
    {
        Modul3 modul3 = new Modul3();
        if (nyawa > 50)
        {
            Assert.AreEqual("Nyawa lebih dari 50", modul3.IfElseLogic(nyawa));
        }
        else
        {
            Assert.AreEqual("Nyawa kurang dari 50", modul3.IfElseLogic(nyawa));
        }
    }  

    [Test]
    [TestCase(100)]
    [TestCase(60)]
    [TestCase(30)]
    public void TestElseIfInt(int nyawa)
    {
        Modul3 modul3 = new Modul3();
        if (nyawa == 100)
        {
            Assert.AreEqual("Nyawa Sempurna", modul3.IfElseIfLogic(nyawa));
        }
        else if (nyawa > 50)
        {
            Assert.AreEqual("Nyawa Lebih dari 50", modul3.IfElseIfLogic(nyawa));
        }
        else
        {
            Assert.AreEqual("Nyawa Kurang dari 50", modul3.IfElseIfLogic(nyawa));
        }
    }

    [Test]
    public void TestOperator()
    {
        int angka = 5;
        if (angka > 1)
        {
            Debug.Log("Angka Lebih dari 1");
        }
        if (angka > 10)
        {
            Debug.Log("Angka lebih dari 10");
        }
        if (angka < 100)
        {
            Debug.Log("Angka kurang dari 100");
        }
        if (angka >= 5)
        {
            Debug.Log("Angka Lebih dari sama dengan 5");
        }
    }

    
}
