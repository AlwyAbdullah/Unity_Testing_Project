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
using UnityEngine.UI;

public class Modul5Test
{
    // A Test behaves as an ordinary method
    [Test]
    [TestCase("Hello World")]
    public void ButtonClickTest(string teks)
    {
        GameObject testObject = GameObject.Find("Button");
        Modul5 modul5 = testObject.GetComponent<Modul5>();

        Debug.Log(modul5.textField.text); // Default New Text
        Assert.AreEqual("New Text", modul5.textField.text);

        testObject.GetComponent<Button>().onClick.AddListener(modul5.TaskOnClick); // Add listener for onclick event
        testObject.GetComponent<Button>().onClick.Invoke(); // OnClick trigger

        Debug.Log(modul5.textField.text); // Text updated based on modul5 stringText

        Assert.AreEqual(teks, modul5.textField.text);
    }
}
