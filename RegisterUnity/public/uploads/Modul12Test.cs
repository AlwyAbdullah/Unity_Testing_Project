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

public class Modul12Test
{
    bool a = true;
    [Test]
    public void SpawnerTest()
    {
        GameObject testObject = MonoBehaviour.Instantiate(Resources.Load<GameObject>("Spawner"));
        Modul12 spawner = testObject.GetComponent<Modul12>();

        spawner.spawn();
        Debug.Log("Position: " + spawner.position);
    }

    [SetUp]
    public void SetupListeners()
    {
        if (a)
        {
            var api = ScriptableObject.CreateInstance<TestRunnerApi>();
            api.RegisterCallbacks(new Callback());

            a = false;
        }
    }
}
