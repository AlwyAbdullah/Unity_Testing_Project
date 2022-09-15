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
using UnityEngine.SceneManagement;
using UnityEditor.SceneManagement;

public class Modul6Test
{
    [Test]
    public void ButtonScene()
    {
        Debug.Log(SceneManager.GetActiveScene().name);
        Debug.Log(EditorSceneManager.GetSceneAt(0).name);
        Debug.Log(EditorSceneManager.sceneCount);
        
        Assert.AreEqual("CobaScene", EditorSceneManager.GetSceneAt(0).name);
    }

    [Test]
    [TestCase(30)]
    [TestCase(80)]
    [TestCase(55)]
    public void SliderTest(int sliderValue)
    {
        GameObject testObject = GameObject.Find("Slider");
        Modul6_Slider modul6 = testObject.GetComponent<Modul6_Slider>();

        testObject.GetComponent<Slider>().value = sliderValue;
        modul6.myText.text = "Current Volume: " + sliderValue;

        Assert.AreEqual("Current Volume: " + sliderValue, modul6.myText.text);
        Assert.AreEqual(sliderValue, testObject.GetComponent<Slider>().value);
    }
}
