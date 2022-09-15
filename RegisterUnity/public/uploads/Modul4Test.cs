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

public class Modul4Test
{
    [Test]
    [TestCase(5)]
    [TestCase(10)]
    public void ForTest(int n)
    {
        int a = 0;
        Modul4 modul4 = new Modul4();
        for (int i = 0; i < n; i++)
        {
            a = i;
        }
        Assert.AreEqual(a, modul4.ForLoop(n));
    }

    [Test]
    [TestCase(3)]
    [TestCase(7)]
    public void WhileLoopTest(int n)
    {
        int i = 0;
        Modul4 modul4 = new Modul4();
        while(i < n)
        {
            i++;
        }
        Assert.AreEqual(i, modul4.WhileLoop(n));
    }

    [Test]
    [TestCase(4)]
    [TestCase(9)]
    public void DoWhileLoopTest(int n)
    {
        int i = 0;
        Modul4 modul4 = new Modul4();
        do
        {
            i++;
        } while (i < n);
        Assert.AreEqual(i, modul4.DoWhileLoop(n));
    }
}
