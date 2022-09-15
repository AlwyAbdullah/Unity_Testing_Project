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

public class Modul10Test
{
    bool a = true;

    [Test]
    public void TestJumpSpace()
    {
        GameObject testObject = MonoBehaviour.Instantiate(Resources.Load<GameObject>("FlappyBird"));
        Modul10 movements = testObject.GetComponent<Modul10>();

        movements.rb = testObject.GetComponent<Rigidbody2D>();

        string x = movements.rb.velocity.ToString();
        Debug.Log("Before Jump: " + x);

        movements.Jump();

        x = movements.rb.velocity.ToString();
        Debug.Log("After Jump: " +x);

        Assert.AreEqual("(0.00, 8.00)", x);
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
