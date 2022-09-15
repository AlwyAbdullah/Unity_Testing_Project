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

public class Modul1Test
{
    // A Test behaves as an ordinary method
    [Test]
    public void TestHelloWorld()
    {
        Modul1 modul1 = new Modul1();
        Assert.AreEqual("Hello World!", modul1.hello);
    }
}
